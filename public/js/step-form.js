document.addEventListener("DOMContentLoaded", function() {
    const steps = document.querySelectorAll(".step");
    let currentStep = 0;

    function showStep(step) {
        steps.forEach((s, index) => {
            s.style.display = index === step ? "block" : "none";
        });
    }

    function updateConfirmation() {

        // waste type
        const waste_types = document.getElementsByName('waste_type');
        let selectedWaste_type_Value;

        for (const waste_type of waste_types) {
            if (waste_type.checked) {
                selectedWaste_type_Value = waste_type.value;
                break; // Exit the loop once the checked radio is found
            }
        }

        // drop of type
        const drop_of_types = document.getElementsByName('drop_of_type');
        let selectedDrop_of_type_Value;

        for (const drop_of_type of drop_of_types) {
            if (drop_of_type.checked) {
                selectedDrop_of_type_Value = drop_of_type.value;
                break; // Exit the loop once the checked radio is found
            }
        }

        document.getElementById("confirmInfo").innerHTML = `<b>Waste Type:</b> ${selectedWaste_type_Value}<br> <b>Drop of Type:</b> ${selectedDrop_of_type_Value}`;

    }

    document.querySelectorAll(".next").forEach((button) => {
        button.addEventListener("click", () => {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
                if (currentStep === steps.length - 1) {
                    updateConfirmation();
                }
            }
        });
    });

    document.querySelectorAll(".prev").forEach((button) => {
        button.addEventListener("click", () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    showStep(currentStep);
});
