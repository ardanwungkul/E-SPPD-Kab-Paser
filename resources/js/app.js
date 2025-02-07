import "./bootstrap";
import { initFlowbite } from "flowbite";
import Alpine from "alpinejs";
import DataTable from "datatables.net-dt";
import "datatables.net-dt/css/dataTables.dataTables.min.css";
import jquery from "jquery";
import L from "leaflet";
import "leaflet/dist/leaflet.css";
import select2 from "select2";
import "/node_modules/select2/dist/css/select2.css";

window.$ = jquery;
window.Alpine = Alpine;

Alpine.start();
select2();
initFlowbite();
