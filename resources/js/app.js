import "./bootstrap";
import Alpine from "alpinejs";
import Chart from "chart.js/auto";
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css";
import { Indonesian } from "flatpickr/dist/l10n/id.js";

window.flatpickr = flatpickr;
window.Chart = Chart;
window.Alpine = Alpine;
Alpine.start();

// Smooth Scroll for anchor links
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");
            if (href !== "#" && document.querySelector(href)) {
                e.preventDefault();
                document
                    .querySelector(href)
                    .scrollIntoView({ behavior: "smooth" });
            }
        });
    });
});
