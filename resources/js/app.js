import "./bootstrap";
import Alpine from "alpinejs";
import Chart from "chart.js/auto";
// import Swal from "sweetalert2";
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css";
import { Indonesian } from "flatpickr/dist/l10n/id.js";

window.flatpickr = flatpickr;
// window.Swal = Swal;
window.Chart = Chart;
window.Alpine = Alpine;
Alpine.start();
