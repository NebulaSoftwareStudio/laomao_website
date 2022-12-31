/**
 * XML Http Request Library
 * composed by Hanawa Hinata
 *
 * Last Updated on 2021/09/07
 *
 */

export default {
    getAction(options){
        // url,param,success
        // console.log(options)
        try{
            let xhr = new XMLHttpRequest();

            // mixin queryParam
            if(options.param != null && options.param !== ''){
                let queryParamUrlArray = [];
                for(let index in options.param){
                    queryParamUrlArray.push(index+'='+options.param[index]);
                }
                options.url += '?' + queryParamUrlArray.join('&');
            }

            // minix header
            if(options.header != null && options.header !== ''){
                for(let index in options.header){
                    xhr.setRequestHeader(index, options.header[index]);
                }
            }
            xhr.timeout = 9000;

            xhr.onreadystatechange = function (e) {
                if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    let response = null;
                    try{
                        response = JSON.parse(xhr.response);
                    }
                    catch{
                        response = xhr.response;
                    }
                    options.success(response);
                }
            };
            xhr.open('GET', options.url, true);
            xhr.send(null);
        }
        catch(err){
            options.fail(err);
        }


    },

    postAction(options){
        try{
            let xhr = new XMLHttpRequest();

            // minix header
            if(options.header != null && options.header !== ''){
                for(let index in options.header){
                    xhr.setRequestHeader(index, options.header[index]);
                }
            }

            xhr.onreadystatechange = function (e) {
                if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    let response = null;
                    try{
                        response = JSON.parse(xhr.response);
                    }
                    catch{
                        response = xhr.response;
                    }
                    options.success(response);
                }

            };
            xhr.open('POST', options.url, true);
            xhr.send(options.param);
        }
        catch(err){
            options.fail(err);
        }

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
