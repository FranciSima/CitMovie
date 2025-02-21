document.addEventListener("DOMContentLoaded", function () {
    let selectedSeats = [];

    document.querySelectorAll(".seat.available").forEach(function (seat) {
        seat.addEventListener("click", function () {
            let seatNumber = this.getAttribute("data-seat");

            if (selectedSeats.includes(seatNumber)) {
                selectedSeats = selectedSeats.filter(s => s !== seatNumber);
                this.classList.remove("selected");
            } else {
                selectedSeats.push(seatNumber);
                this.classList.add("selected");
            }

            document.getElementById("selectedSeats").value = selectedSeats.join(",");
        });
    });
});
