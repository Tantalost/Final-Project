document.addEventListener('DOMContentLoaded', () => {
  const quantityModal = document.getElementById("quantityModal");
  const confirmationModal = document.getElementById("confirmationModal");

  const openBtn = document.querySelector('.form-group img'); 

  const increaseBtn = document.getElementById("increase");
  const decreaseBtn = document.getElementById("decrease");

  const quantityDisplay = document.getElementById("quantity"); 
  const confirmQuantityDisplay = document.getElementById("confirmQuantity");

  const addBtn1 = quantityModal.querySelector(".modal-btn.add"); 
  const cancelBtn1 = quantityModal.querySelector(".modal-btn.cancel");

  const cancelBtn2 = confirmationModal.querySelector(".modal-btn.cancel");

  let quantity = 0;


  openBtn.addEventListener("click", () => {
    quantityModal.style.display = "block";
  });


  increaseBtn.addEventListener("click", () => {
    quantity++;
    quantityDisplay.textContent = quantity;
  });

  decreaseBtn.addEventListener("click", () => {
    if (quantity > 0) {
      quantity--;
      quantityDisplay.textContent = quantity;
    }
  });


  addBtn1.addEventListener("click", () => {
    if (quantity > 0) {
      quantityModal.style.display = "none";
      confirmQuantityDisplay.textContent = quantity;
      confirmationModal.style.display = "block";
    } else {
      alert("Please select at least 1 book to add.");
    }
  });


  cancelBtn1.addEventListener("click", () => {
    quantityModal.style.display = "none";
    quantity = 0;
    quantityDisplay.textContent = quantity;
  });

  cancelBtn2.addEventListener("click", () => {
    confirmationModal.style.display = "none";
    quantity = 0;
    quantityDisplay.textContent = quantity;
  });

  window.addEventListener("click", (e) => {
    if (e.target === quantityModal) {
      quantityModal.style.display = "none";
      quantity = 0;
      quantityDisplay.textContent = quantity;
    }

    if (e.target === confirmationModal) {
      confirmationModal.style.display = "none";
      quantity = 0;
      quantityDisplay.textContent = quantity;
    }
  });
});
