'use strict'
const Phone = async () => {
    var telphone = document.getElementById('phone');

    telphone.addEventListener('keypress', () => {
        var clearField = telphone.value.replace(/\D/g, "").substring(0, 10);
        telphone.value = clearField;


        var lenghtinput = telphone.value.length;
        var numberArrey = clearField.split("");
        var numberFormat = "";


        if (lenghtinput > 0) {
            numberFormat += `(${numberArrey.slice(0, 2).join("")})`;
        }
        if (lenghtinput > 2) {
            numberFormat += ` ${numberArrey.slice(2, 6).join("")}-`;
        }
        if (lenghtinput > 6) {
            numberFormat += `${numberArrey.slice(6, 10).join("")}`;
        }

        telphone.value = numberFormat;
    })



    telphone.addEventListener('focusout', () => {
        var clearField = telphone.value.replace(/\D/g, "").substring(0, 10);
        telphone.value = clearField;


        var lenghtinput = telphone.value.length;
        var numberArrey = clearField.split("");
        var numberFormat = "";


        if (lenghtinput > 0) {
            numberFormat += `(${numberArrey.slice(0, 2).join("")})`;
        }
        if (lenghtinput > 2) {
            numberFormat += ` ${numberArrey.slice(2, 6).join("")}-`;
        }
        if (lenghtinput > 6) {
            numberFormat += `${numberArrey.slice(6, 10).join("")}`;
        }

        telphone.value = numberFormat;
    })



}
Phone();


const Cellphone = async () => {
    var phone = document.getElementById('cellphone');

    phone.addEventListener('keypress', () => {
        var clearField = phone.value.replace(/\D/g, "").substring(0, 12);
        phone.value = clearField;

        var lenghtinput = phone.value.length;
        var numberArrey = clearField.split("");
        var numberFormat = "";


        if (lenghtinput > 0) {
            numberFormat += `(${numberArrey.slice(0, 2).join("")})`;
        }

        if (lenghtinput > 2) {
            numberFormat += ` ${numberArrey.slice(2, 6).join("")}`;

        }

        if (lenghtinput > 5) {
            numberFormat += `-${numberArrey.slice(6, 10).join("")}`;

        }

        phone.value = numberFormat;

    })


    phone.addEventListener('focusout', () => {
        var clearField = phone.value.replace(/\D/g, "").substring(0, 12);
        phone.value = clearField;

        var lenghtinput = phone.value.length;
        var numberArrey = clearField.split("");
        var numberFormat = "";


        if (lenghtinput > 0) {
            numberFormat += `(${numberArrey.slice(0, 2).join("")})`;
        }

        if (lenghtinput > 2) {
            numberFormat += ` ${numberArrey.slice(2, 6).join("")}`;

        }

        if (lenghtinput > 5) {
            numberFormat += `-${numberArrey.slice(6, 10).join("")}`;

        }

        phone.value = numberFormat;

    })


}
Cellphone();
