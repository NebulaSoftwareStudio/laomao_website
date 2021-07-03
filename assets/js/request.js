/**
 * XML Http Request Library
 * composed by Hanawa Hinata
 *
 * Last Updated on 2020/12/20
 *
 */

export default {
    getAction(url,queryParam,header){
        return new Promise((resolve, reject) => {
            let xhr = new XMLHttpRequest();

            // mixin queryParam
            if(queryParam!==undefined&&queryParam!==null&&queryParam!==''){
                let queryParamUrlArray = [];
                for(let index in queryParam){
                    queryParamUrlArray.push(index+'='+queryParam[index]);
                }
                url += '?' + queryParamUrlArray.join('&');
            }

            // minix header
            if(header!==undefined&&header!==null&&header!==''){
                for(let index in header){
                    xhr.setRequestHeader(index, header[index]);
                }
            }


            xhr.open('GET', url, false);
            xhr.onreadystatechange = function (e) {
                let response = null;
                try{
                    response = JSON.parse(xhr.response);
                }
                catch{
                    response = xhr.response;
                }
                resolve(response)
            };
            xhr.send(null);
        })
    },

    postAction(url,queryParam,header){
        return new Promise((resolve, reject) => {
            let xhr = new XMLHttpRequest();

            // minix header
            if(header!==undefined&&header!==null&&header!==''){
                for(let index in header){
                    xhr.setRequestHeader(index, header[index]);
                }
            }


            xhr.open('POST', url, false);
            xhr.onreadystatechange = function (e) {
                let response = null;
                try{
                    response = JSON.parse(xhr.response);
                }
                catch{
                    response = xhr.response;
                }
                resolve(response)
            };
            xhr.send(queryParam);
        })
    },

    putAction(){

    },

    deleteAction(){

    },

    httpAction(url,queryParam,methods,header){
        methods = methods.toUpperCase();
        switch(methods){
            case 'POST': this.postAction(url,queryParam,header); break;
            case 'PUT': this.putAction(url,queryParam,header); break;
            case 'DELETE': this.deleteAction(url,queryParam,header); break;
            default: this.getAction(url,queryParam,header); break;
        }
    },


}
