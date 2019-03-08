function calculateFacorization(number) {
    let by = 2
    let result = []

    do {
        let count = 0
        if (number % by === 0) {
            number /= by
            count++
        }

        if (count === 0) {
            by++
        } else {
            result.push(by)
        }
    } while (number > 1)

    const noRepeatedResults = [...new Set(result)]

    const amount = []
    noRepeatedResults.forEach(number => {
        amount.push({
            number,
            "toThe": countItems(result, number)
        })
    })

    return {
        result,
        amount
    }
}

function countItems(array, item) {
    let sum = 0
    for (let i = 0; i < array.length; i++) {
        if (array[i] === item) {
            sum++
        } else if (sum > 0 && array[i] !== item) {
            break
        }
    }

    return sum
}

console.log(calculateFacorization(20))