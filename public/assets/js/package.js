document.addEventListener("DOMContentLoaded", function () {
  // Radio inputleri seç
  const radioInputs = document.querySelectorAll('input[name="plan_id"]');

  // İlk radio inputu seçili hale getir
  radioInputs[0].checked = true;
  radioInputs.forEach((radio) => {
    radio.addEventListener("click", (item) => {
      item.checked = true;
    });
  });
  const radioButtons = document.querySelectorAll(".custom-radio");

  const selectedPriceSpan = document.querySelector("#selectedPrice");
  selectedPriceSpan.textContent = radioButtons[0].getAttribute("data-price");
  const purchaseLink = document.querySelector("#purchaseLink");
  purchaseLink.href = radioButtons[0].getAttribute("data-url");

  // purchaseLink.href = "/purchase-plan?id=" + radioButtons[0].getAttribute("value");
  radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener("change", function () {
      // Seçilen radio butonunun fiyatını alın
      const selectedPrice = radioButton.getAttribute("data-price");

      // Satın alınan fiyatı güncelleyin
      selectedPriceSpan.textContent = selectedPrice;
      // purchaseLink.href = "/purchase-plan?id=" + radioButton.getAttribute("value");
      purchaseLink.href = radioButton.getAttribute("data-url");
      
      // İstediğiniz başka işlemleri burada gerçekleştirebilirsiniz
    });
  });
});
