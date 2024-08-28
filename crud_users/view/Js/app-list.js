import { ReadCustomers } from '../service/service.js';

const ClearTable = () => {
    const rows = document.querySelectorAll('#Tablelist>tbody tr');
    rows.forEach(row => row.paretNode.removeChild(row));
    console.clear();
}


const CreateRow = async (custumer) => {

        const newRow = document.createElement('tr');
        let date_american = custumer.birthday
        const date_br = date_american.split('-').reverse().join('/')

        newRow.innerHTML = `
              <td>${custumer.name}</td>
              <td>${date_br}</td>
              <td>${custumer.mail}</td>
              <td>${custumer.phone}</td>
              <td class="icon_input">
              <input type="image" src="./Img/editar.png" id="edit-${custumer.id}" alt="Submit">
              <input type="image" src="./Img/excluir.png" id="delete-${custumer.id}" alt="Submit" />
              </td>
              
    `;
        document.querySelector('#Tablelist>tbody').appendChild(newRow);
}

const ReadList = async () => {
    const readlist = await ReadCustomers();
    ClearTable();
    readlist.forEach(CreateRow);

}

ReadList();

export {
    ReadList
};
console.clear()