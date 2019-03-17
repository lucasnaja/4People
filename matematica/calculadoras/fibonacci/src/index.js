const txtResult = document.querySelector('#result')
const txtNum = document.querySelector('#number')
const type = document.querySelector('[name=type]')

function calculate() {
    if (txtNum.value !== '') {
        txtResult.value = calculateFibonacci(BigInt(txtNum.value), !type.checked)
    } else {
        M.toast({
            html: 'Valor não permitido!',
            classes: 'red accent-4'
        })
    }
}

function copyResult() {
    if (txtResult.value !== '') {
        txtResult.select()
        document.execCommand('copy')

        M.toast({
            html: 'Copiado!',
            classes: 'green'
        })
    } else {
        M.toast({
            html: 'Fatore o número primeiro.',
            classes: 'red accent-4'
        })
    }
}