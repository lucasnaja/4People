M.FormSelect.init(document.querySelectorAll('select'))
M.Datepicker.init(document.querySelectorAll('.datepicker'), {
	format: 'mmmm dd (dddd), yyyy',
	yearRange: 25,
	i18n: {
		cancel: '',
		clear: 'Limpar',
		done: 'Selecionar',
		months: [
			'Janeiro',
			'Fevereiro',
			'Março',
			'Abril',
			'Maio',
			'Junho',
			'Julho',
			'Agosto',
			'Setembro',
			'Outubro',
			'Novembro',
			'Dezembro'
		],
		monthsShort: [
			'Jan',
			'Fev',
			'Mar',
			'Abr',
			'Mai',
			'Jun',
			'Jul',
			'Ago',
			'Set',
			'Out',
			'Nov',
			'Dez'
		],
		weekdays: [
			'Domingo',
			'Segunda',
			'Terça',
			'Quarta',
			'Quinta',
			'Sexta',
			'Sábado'
		],
		weekdaysShort: [
			'Dom',
			'Seg',
			'Ter',
			'Qua',
			'Qui',
			'Sex',
			'Sáb'
		]
	}
})

const date = M.Datepicker.getInstance(document.querySelector('#date'))
const txtAdd = document.querySelector('#number')
const txtOption = document.querySelector('#option')
const lblResult = document.querySelector('#result')

const calculate = () => {
	if (date.date !== undefined) {
		const newDate =
			txtOption.value === '0' ? addDays(date.date, Number(txtAdd.value)) :
			txtOption.value === '1' ? addWeeks(date.date, Number(txtAdd.value)) :
			txtOption.value === '2' ? addMonths(date.date, Number(txtAdd.value)) :
			addYears(date.date, Number(txtAdd.value))

		lblResult.innerHTML = `Nova data: ${newDate.toLocaleDateString('pt')}`
	} else {
		M.toast({
			html: 'Selecione a data primeiro.',
			classes: 'red accent-4'
		})
	}
}

document.addEventListener('DOMContentLoaded', () => {
	date.cancelBtn.disabled = true

	date.setDate(new Date())
	date.doneBtn.click()

	calculate()
})
