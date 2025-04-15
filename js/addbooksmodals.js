document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById("quantityModal");
    const openBtn = document.querySelector('.form-group img');
    const cancelBtn = document.querySelector(".modal-btn.cancel");
    const quantityDisplay = document.getElementById("quantity");
    const increaseBtn = document.getElementById("increase");
    const decreaseBtn = document.getElementById("decrease");
  
    let quantity = 0;
  
    openBtn.addEventListener("click", () => {
      modal.style.display = "block";
    });
  
    cancelBtn.addEventListener("click", () => {
      modal.style.display = "none";
      quantity = 0;
      quantityDisplay.textContent = quantity;
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
  
    window.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.style.display = "none";
        quantity = 0;
        quantityDisplay.textContent = quantity;
      }
    });
  });