M.FormSelect.init(document.querySelectorAll('select'))

const txtResult = document.querySelector('#result')
const txtLongerBase = document.querySelector('#longerBase')
const txtShorterBase = document.querySelector('#shorterBase')
const txtHeight = document.querySelector('#height')
const txtMeasure = document.querySelector('#measure')
const txtDecimal = document.querySelector('#decimal')

const calculate = () => {
	if (txtMeasure.value !== '') {
		const area = calculateTrapezoidArea(parseFloat(txtShorterBase.value), parseFloat(txtLongerBase.value), parseFloat(txtHeight.value))
		txtResult.value = `${txtDecimal.value === '-1' ? area : area.toFixed(parseInt(txtDecimal.value), 10)}${txtMeasure.value}²`
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

txtLongerBase.onkeyup = e => {
	if (e.which === 13) txtShorterBase.focus()
}

txtShorterBase.onkeyup = e => {
	if (e.which === 13) txtHeight.focus()
}

txtHeight.onkeyup = e => {
	if (e.which === 13) calculate()
}

