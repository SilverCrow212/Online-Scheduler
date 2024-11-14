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


export async function CreateAcc(details, toast) {
    try {
        const receive = await axios.post('user/register', details);
        toast.add({ 
            severity: 'success', 
            summary: 'Account Created Successfully', 
            detail: 'You have created an account successfully.', 
            life: 3000 
        });
        console.log('received');
        return 'received';
    } catch (err) {
        console.error('error', err);
        toast.add({ severity: 'error', summary: 'An error has occured', detail: 'Message Detail', life: 3000 });
    }
}

export async function EditAcc(details, toast) {
    const token = localStorage.getItem('token');
    try {
        // const receive = await axios.put('user/user_details_update', details);
        const response = await axios.put('user/user_details_update', {...details}, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
        toast.add({ 
            severity: 'success', 
            summary: 'Details Updated Successfully', 
            detail: 'You have updated the account successfully.', 
            life: 3000 
        });
        console.log('received');
        return 'received';
    } catch (err) {
        console.error('error', err);
        toast.add({ severity: 'error', summary: err.response.data.message, detail: 'Message Detail', life: 3000 });
    }
}

export async function EditPassword(password, toast) {
    const token = localStorage.getItem('token');
    try {
        // const receive = await axios.put('user/user_password_update', password);
        const response = await axios.post('user/change_password', password, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
        toast.add({ 
            severity: 'success', 
            summary: 'Password Updated Successfully', 
            detail: 'You have updated the account successfully.', 
            life: 3000 
        });
        console.log('received');
        return 'received';
    } catch (err) {
        console.error('error', err);
        toast.add({ severity: 'error', summary: err.response.data.message, detail: 'Message Detail', life: 3000 });
    }
}

export async function EditEmail(email, toast) {
    const token = localStorage.getItem('token');
    try {
        // const receive = await axios.put('user/user_email_update', email);
        const response = await axios.post('user/change_email', {...email}, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
        toast.add({ 
            severity: 'success', 
            summary: 'Email Updated Successfully', 
            detail: 'You have updated the account successfully.', 
            life: 3000 
        });
        console.log('received');
        return 'received';
    } catch (err) {
        console.error('error', err);
        toast.add({ severity: 'error', summary: err.response.data.message, detail: 'Message Detail', life: 3000 });
    }
}

export async function EditSecurity(security, toast) {
    const token = localStorage.getItem('token');
    try {
        // const receive = await axios.put('user/user_security_update', security);
        const response = await axios.post('update-security-question', {...security}, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
        toast.add({ 
            severity: 'success', 
            summary: 'Security Question Updated Successfully', 
            detail: 'You have updated the account successfully.', 
            life: 3000 
        });
        console.log('received');
        return 'received';
    } catch (err) {
        console.error('error', err);
        toast.add({ severity: 'error', summary: err.response.data.message, detail: 'Message Detail', life: 3000 });
    }
}


export async function SecurityQuestions() {
    try {
        const receive = await axios.get('security-question');
        return receive.data.security_question;
    } catch (err) {
        console.error('error', err);
        toast.add({ severity: 'error', summary: 'Refresh Page', detail: 'Message Detail', life: 3000 });
    }
}


export async function verifySecurity(email) {
    // const token = localStorage.getItem('token');
    try {
        // const receive = await axios.put('user/user_email_update', email);
        const response = await axios.post('verify-security-question', {...email});
        // toast.add({ 
        //     severity: 'success', 
        //     summary: 'Email Updated Successfully', 
        //     detail: 'You have updated the account successfully.', 
        //     life: 3000 
        // });
        console.log(response);
        return response.data.status;
    } catch (err) {
        console.error('error', err);
        // toast.add({ severity: 'error', summary: err.response.data.message, detail: 'Message Detail', life: 3000 });
    }
}

export async function ResetPassword(email) {
    // const token = localStorage.getItem('token');
    try {
        // const receive = await axios.put('user/user_email_update', email);
        const response = await axios.post('reset-password', {...email});
        // toast.add({ 
        //     severity: 'success', 
        //     summary: 'Email Updated Successfully', 
        //     detail: 'You have updated the account successfully.', 
        //     life: 3000 
        // });
        console.log(response);
        return response.data.status;
    } catch (err) {
        console.error('error', err);
        // toast.add({ severity: 'error', summary: err.response.data.message, detail: 'Message Detail', life: 3000 });
    }
}