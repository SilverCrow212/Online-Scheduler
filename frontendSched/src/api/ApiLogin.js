import axios from 'axios';


export async function Login(login,toast) {
    try {
        const receive = await axios.post('login', login);
        toast.add({ 
            severity: 'success', 
            summary: 'Login Successful', 
            detail: 'You have logged in successfully.', 
            life: 3000 
        });
        return receive.data.token;
    } catch (err) {
        console.error('error', err);
        toast.add({ severity: 'error', summary: err.response.data.message, detail: 'Message Detail', life: 3000 });
    }
}

export async function CreateAcc(details) {
    try {
        const receive = await axios.post('user/register', details);
        toast.add({ 
            severity: 'success', 
            summary: 'Account Created Successfully', 
            detail: 'You have created an account successfully.', 
            life: 3000 
        });
        console.log('received');
    } catch (err) {
        console.error('error', err);
        toast.add({ severity: 'error', summary: err.response.data.message, detail: 'Message Detail', life: 3000 });
    }
}