const txtResult = document.querySelector('#result')
const txtValueA = document.querySelector('#valueA')
const txtValueB = document.querySelector('#valueB')
const txtValueC = document.querySelector('#valueC')

const calculate = () => {
	if (txtValueA.value !== '' && parseInt(txtValueA.value) !== 0 && txtValueB.value !== '' && txtValueC.value !== '') {
		let bhaskara = calculateBhaskara(
			parseFloat(txtValueA.value),
			parseFloat(txtValueB.value),
			parseFloat(txtValueC.value)
		)

		bhaskara.delta = Number.isInteger(bhaskara.delta) ? bhaskara.delta : bhaskara.delta.toFixed(2)
		bhaskara.x1 = Number.isInteger(bhaskara.x1) ? bhaskara.x1 : bhaskara.x1.toFixed(2)
		bhaskara.x2 = Number.isInteger(bhaskara.x2) ? bhaskara.x2 : bhaskara.x2.toFixed(2)

		if (bhaskara.delta < 0) txtResult.value = `Δ: ${bhaskara.delta}. ${bhaskara.msg}`
		else if (bhaskara.delta === 0) txtResult.value = `Δ: ${bhaskara.delta}. Conj. Solução: { ${bhaskara.x1}, ${bhaskara.x2} }. ${bhaskara.msg}`
		else txtResult.value = `Δ: ${bhaskara.delta}. Conj. Solução: { ${bhaskara.x1}, ${bhaskara.x2} }. ${bhaskara.msg}`
	} else {
		M.toast({
			html: 'Valor não permitido.',
			classes: 'red accent-4'
		})
	}
}

const copyResult = () => {
	if (txtResult.value !== '') {
		txtResult.select()
		document.execCommand('copy')

		M.toast({
			html: 'Copiado para a Área de Transferência.',
			classes: 'green'
		})
	} else {
		M.toast({
			html: 'Não foi possível copiar.',
			classes: 'red accent-4'
		})
	}
}

const clearInput = () => {
	txtResult.value = ''
}

txtValueA.onkeyup = e => {
	if (e.which === 13) txtValueB.select()
}

txtValueB.onkeyup = e => {
	if (e.which === 13) txtValueC.select()
}

valueC.onkeyup = e => {
	if (e.which === 13) calculate()
}
