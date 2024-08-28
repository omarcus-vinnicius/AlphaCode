'use strict'

const url = 'http://localhost:3000/api/crud/contacts/users';

const ReadCustomers = async () => {

    const reponse = await fetch(url);

    return await reponse.json();

}

const ReadCustomersID = async (id) => {

    const reponse = await fetch(`${url}/${id}`);
    return await reponse.json();

}


const CreatCustomer = async (customer) => {
    console.log(customer);
    const option = {
        method: 'POST',
        body: JSON.stringify(customer),
        headers: {
            'content-type': 'application/json'
        }
    }

    const response = await fetch(url, option);
    const userMessage = await response.json();
    if (response.ok) {
        alert(userMessage['userMessage'])
        setTimeout(location.reload(), 1000)
    }else{
        alert(userMessage['userMessage'])
        
    }

}


const DeleteCustomer = async (id) => {

    const option = {
        method: 'DELETE',
    }
    const response = await fetch(`${url}/${id}`, option);
    const userMessage = await response.json();

    if (response.ok) {
        alert(userMessage['userMessage'])
        setTimeout(location.reload(), 1000)
    } else {
        alert(userMessage['userMessage'])
        setTimeout(location.reload(), 1000)
    }


}

const UptadeCustomer = async (client) => {
    const option = {
        method: 'PUT',
        body: JSON.stringify(client),
        headers: {
            'content-type': 'application/json'
        }
    }

    const response = await fetch(url, option);
    const userMessage = await response.json();

    if (response.ok) {
        alert(userMessage['userMessage'])
        setTimeout(location.reload(), 1000)
    } else {
        alert(userMessage['userMessage'])  
    }
}

export {
    ReadCustomers,
    ReadCustomersID,
    CreatCustomer,
    DeleteCustomer,
    UptadeCustomer

}
