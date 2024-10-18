async function openDashboard(){
    try{
        const receive = await axios.post('/login', login.value)
        console.log(receive,'logged in');
        router.push({ name: 'dashboard' });
    }
    catch(err){
        console.error('error',err)
    }
}