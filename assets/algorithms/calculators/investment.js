const calculateInvestment = ({ value = 0, CDI = 0, perMonth = 0, months = 0, IR = false }) => {
	CDI /= 12
	CDI /= 100

	const formatter = Intl.NumberFormat([], { style: 'currency', currency: 'BRL' })
	const oldValue = value

	for (let i = 0; i < months; i++) {
		value += value * CDI

		if (i > 0) value += perMonth
	}

	let profit = value - perMonth * (months - 1) - oldValue
	const tax = IR ? profit * (months < 7 ? .225 : (months < 13 ? .2 : (months < 25 ? .175 : .15))) : 0
	profit -= tax
	value -= tax

	return {
		start: formatter.format(oldValue),
		amountMonths: months,
		amountYears: Math.floor(months / 12),
		tax: formatter.format(tax),
		profit: formatter.format(profit),
		perMonth: formatter.format(profit / months),
		perYear: formatter.format(profit / Math.floor(months / 12)),
		total: formatter.format(value),
	}
}
