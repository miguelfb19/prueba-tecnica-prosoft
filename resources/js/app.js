import "./bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";

document.addEventListener("DOMContentLoaded", function () {
    let isUpdate = false;

    window.changeIsUpdate = function (value) {
        isUpdate = value;
        document.querySelector("#modal-title").textContent = isUpdate
            ? "Update task"
            : "New task";
        document.querySelector("#modal-btn-save").textContent = isUpdate
            ? "Update"
            : "Save";
        document.querySelector("#modal-btn-close").textContent = isUpdate
            ? "Cancel"
            : "Close";
    };
});
