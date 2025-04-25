const steps = document.querySelectorAll('.step');
const stepIndicators = document.querySelectorAll('.step-indicator');
let currentStep = 0;
function showStep(step) {
stepIndicators.forEach((indicator, index) => {
indicator.classList.toggle('active', index === step);
indicator.classList.toggle('completed', index < step);
});
steps.forEach((stepElement, index) => {
stepElement.classList.toggle('active', index === step);
});
document.getElementById('prevBtn').disabled = (step === 0);
if (step === steps.length - 1) {
document.getElementById('nextBtn').style.display = 'none';
document.getElementById('submitBtn').style.display = 'inline-block';
} else {
document.getElementById('nextBtn').style.display = 'inline-block';
document.getElementById('submitBtn').style.display = 'none';
}
}
function nextStep() {
if (currentStep < steps.length - 1) {
currentStep++;
showStep(currentStep);
}
}
function prevStep() {
if (currentStep > 0) {
currentStep--;
showStep(currentStep);
}
}
document.getElementById('multiStepForm').addEventListener('submit', function (event) {
event.preventDefault();
document.getElementById("result").innerText = "Form submitted!";
});
showStep(currentStep);