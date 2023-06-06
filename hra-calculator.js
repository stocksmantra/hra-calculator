document.getElementById("hra-form").addEventListener("submit", function (event) {
    event.preventDefault();

    const basicSalary = parseFloat(document.getElementById("basic-salary").value);
    const hraReceived = parseFloat(document.getElementById("hra-received").value);
    const rentPaid = parseFloat(document.getElementById("rent-paid").value);
    const metroCity = document.getElementById("metro-city").checked;

    const hraExemption = calculateHraExemption(basicSalary, hraReceived, rentPaid, metroCity);
    const taxableHra = hraReceived - hraExemption;

    document.getElementById("result").innerHTML = `
       <h5> <p>Exempted HRA: ₹${hraExemption.toFixed(2)}</p>
        <p>Taxable HRA: ₹${taxableHra.toFixed(2)}</p></h5>
    `;
});

function calculateHraExemption(basicSalary, hraReceived, rentPaid, metroCity) {
    const cityFactor = metroCity ? 0.5 : 0.4;
    const hraExemption1 = rentPaid - (basicSalary * 0.1);
    const hraExemption2 = basicSalary * cityFactor;
    const hraExemption3 = hraReceived;

    return Math.min(hraExemption1, hraExemption2, hraExemption3);
}