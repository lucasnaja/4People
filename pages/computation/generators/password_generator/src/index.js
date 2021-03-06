const txtResult = document.querySelector('#result')
const rbFirstChar = document.querySelectorAll('[type=radio]')
const cbOtherChars = document.querySelectorAll('[type=checkbox]:not(#equalChars):not(#similarChars)')
const cbEqualChars = document.querySelector('#equalChars')
const cbSimilarChars = document.querySelector('#similarChars')
const cbAdditionalChars = document.querySelector('#additionalChars')
const cbStrength = document.querySelector('#strength')
const txtLength = document.querySelector('#length')
const lblPasswordLength = document.querySelector('#passwordLength')

const generate = () => {
	if (!cbOtherChars[0].checked && !cbOtherChars[1].checked && !cbOtherChars[2].checked && !cbOtherChars[3].checked) {
		M.toast({
			html: 'Selecione uma opção antes de gerar uma senha.',
			classes: 'red accent-4'
		})
	} else {
		const password = generatePassword(
			parseInt(txtLength.value),
			rbFirstChar[0].checked ? 'number' : rbFirstChar[1].checked ? 'upperCase' : rbFirstChar[2].checked ? 'lowerCase' : 'special',
			cbOtherChars[0].checked,
			cbOtherChars[1].checked,
			cbOtherChars[2].checked,
			cbOtherChars[3].checked,
			cbAdditionalChars.value,
			cbEqualChars.checked,
			cbSimilarChars.checked,
			true
		)

		lblPasswordLength.style.color = password.strength === 'Inaceitável' ? 'red' : password.strength === 'Baixo' ? 'orangered' : password.strength === 'Mediana' ? 'orange' : password.strength === 'Boa' ? 'green' : 'blue'
		lblPasswordLength.innerHTML = password.strength
		txtResult.value = password.password
	}
}

const savePassword = () => {
	if (txtResult.value.trim() !== '') {
		saveAs(new File([`Senha: ${txtResult.value}`], "Senha.txt", {
			type: "text/plain;charset=utf-8"
		}))
		M.toast({
			html: 'Senha salva com sucesso.',
			classes: 'green'
		})
	} else {
		M.toast({
			html: 'Não foi possível salvar a senha.',
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
			html: 'Não foi possível copiar a Senha.',
			classes: 'red accent-4'
		})
	}
}

const clearInput = () => {
	lblPasswordLength.innerHTML = ''
	txtResult.value = ''
}

cbStrength.onchange = () => {
	if (cbStrength.checked) lblPasswordLength.parentElement.hidden = false
	else lblPasswordLength.parentElement.hidden = true
}
