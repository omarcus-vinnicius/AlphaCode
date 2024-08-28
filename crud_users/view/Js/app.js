import {
    ReadCustomersID,
    CreatCustomer,
    DeleteCustomer,
    UptadeCustomer
} from '../service/service.js';
import { ReadList } from './app-list.js';

const IsValide = () => {
    document.getElementById('modal-for').reportValidity();
}

const Clear = () => {
    const fields = document.querySelectorAll('.modal-field');
    fields.forEach(field => field.value = "");
}

const SalveCustomer = () => {

    const send_mail_permission = document.getElementById('send_mail_permission').checked ? 1 : 0
    const send_wpp = document.getElementById('send_wpp').checked ? 1 : 0
    const send_sms_permission = document.getElementById('send_sms_permission').checked ? 1 : 0

    if (IsValide) {

        const index = document.getElementById('name').dataset.index;
        const customer = {
            name: document.getElementById('name').value,
            mail: document.getElementById('mail').value,
            birthday: document.getElementById('birthday').value,
            occupation: document.getElementById('occupation').value,
            phone: document.getElementById('phone').value,
            cellphone: document.getElementById('cellphone').value,
            send_mail_permission: send_mail_permission,
            send_wpp: send_wpp,
            send_sms_permission: send_sms_permission
        }

        if (index == 'new') {

            CreatCustomer(customer);
            ReadList();

        } else {

            const customer = {
                id: document.getElementById('name').dataset.index,
                name: document.getElementById('name').value,
                mail: document.getElementById('mail').value,
                birthday: document.getElementById('birthday').value,
                occupation: document.getElementById('occupation').value,
                phone: document.getElementById('phone').value,
                cellphone: document.getElementById('cellphone').value,
                send_mail_permission: send_mail_permission,
                send_wpp: send_wpp,
                send_sms_permission: send_sms_permission
            }

            UptadeCustomer(customer);
            Clear();

        }

    }

}

const FillForm = (customer) => {

    document.getElementById('name').value = customer.name,
    document.getElementById('mail').value = customer.mail,
    document.getElementById('birthday').value = customer.birthday,
    document.getElementById('occupation').value = customer.occupation,
    document.getElementById('phone').value = customer.phone,
    document.getElementById('cellphone').value = customer.cellphone,
    document.getElementById('name').dataset.index = customer.id;

}

const Editcustomer = async (index) => {
    const customer = await ReadCustomersID(index);
    const customerID = await customer[0];
    FillForm(customerID);
}

const Delete = async () => {

    if (event.target.type == 'image') {

        const [action, index] = event.target.id.split('-');

        if (action == 'edit') {

            Editcustomer(index);

        } else if (action == 'delete') {
            const del = confirm("Deseja realmente excluir esse contato ?");

            if(del){
                DeleteCustomer(index);
                Clear();
            }
        }
    }
}


document.getElementById('save').addEventListener('click', SalveCustomer);
document.querySelector('#Tablelist>tbody').addEventListener('click', Delete);
console.clear()