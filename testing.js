function sendSMS() {
  const phoneNumber = document.getElementById("contactno").value;
  const message =
    "We have successfully recived your request. \n Our team will contact you as soon as possible.\n Team Krishi Mitra  ";

  // Send phone number and message to backend
  fetch("http://localhost:3020/send-sms", {
    // Modify this URL according to your backend configuration
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ phoneNumber, message }),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      alert(data.message);
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Failed to send SMS");
    });
}
