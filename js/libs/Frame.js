'use strict';

class Frame {
    static ajaxRequest(method, request, async = true) {
        let xhr = new XMLHttpRequest();

        xhr.open(method, request, async);
        xhr.send();
    }

    static ajaxResponse(method, request, callback, async = true, html = false) {
        let xhr = new XMLHttpRequest(),
            data = '';

        xhr.open(method, request, async);
        xhr.onreadystatechange = () => {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              if (!html){
                data = JSON.parse(xhr.responseText);
              } else {
                data = xhr.response;
              }
                if (callback !== undefined) {
                    return callback(data);
                }
            }
        };
        xhr.send();
    }
}
