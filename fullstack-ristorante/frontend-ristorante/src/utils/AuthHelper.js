import apiConfig from "../config/apiConfig"

export default async function apiFetch(route, method ="GET", body = undefined, hasToken = true){
    let headers = {
        'Content-Type': 'application/json'
    }
    
    if(hasToken)
        headers = {...headers, 'Authorization': `Bearer ${getAccessToken()}`}

    const options = {
        method,
        headers
    }

    if(body) options.body = JSON.stringify(body)

    try{
        const url = `${apiConfig.baseUrl}/${route}`;
        const response = await fetch(url, options);

        if(!response.ok){
            throw new Error(`Error ${response.status}`);
        }

        return await response.json();
    }catch(err){
        console.error(err);
    }
}

export function getAccessToken(){
    const accessDataString = localStorage.getItem('access_data');
    if(!accessDataString) return null;

    const accessData = JSON.parse(accessDataString);

    return accessData.access_token
}