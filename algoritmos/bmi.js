function calculateBMI(height, weight) {
    let bmi = weight / height ** 2
    if (!Number.isFinite(bmi)) bmi = 0
    
    const description = bmi < 17 ?
        "Muito abaixo do peso" : bmi < 18.5 ?
        "Abaixo do peso" : bmi < 24.5 ?
        "Peso normal" : bmi < 30 ?
        "Acima do peso" : bmi < 35 ?
        "Obesidade 1" : bmi < 40 ?
        "Obesidade 2 (Severa)" : "Obesidade 3 (Mórbida)"

    return {
        bmi,
        description
    }
}