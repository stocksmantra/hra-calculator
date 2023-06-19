document.getElementById("hra-form").addEventListener("submit", function (event) {
    event.preventDefault();

    const basicSalary = parseFloat(document.getElementById("basic-salary").value);
    const dearnessAllowance = parseFloat(document.getElementById("dearness-allowance").value);
    const hraReceived = parseFloat(document.getElementById("hra-received").value);
    const rentPaid = parseFloat(document.getElementById("rent-paid").value);
    const metroCity = document.getElementById("metro-city").checked;

    const hraExemption = calculateHraExemption(basicSalary, dearnessAllowance, hraReceived, rentPaid, metroCity);
    const taxableHra = hraReceived - hraExemption;
    const difference = taxableHra + hraExemption;

    document.getElementById("result").innerHTML = `
       <h5> <p>Exempted HRA: ₹${difference.toFixed(2)}</p>
        <p>Taxable HRA: ₹${taxableHra.toFixed(2)}</p>
        </h5>
    `;
});


function calculateHraExemption(basicSalary, dearnessAllowance, hraReceived, rentPaid, metroCity) {
    const totalSalary = basicSalary + dearnessAllowance;
    const cityFactor = metroCity ? 0.5 : 0.4;
    const hraExemption1 = rentPaid - (totalSalary * 0.1);
    const hraExemption2 = totalSalary * cityFactor;
    const hraExemption3 = hraReceived;

    return Math.min(hraExemption1, hraExemption2, hraExemption3);
}
