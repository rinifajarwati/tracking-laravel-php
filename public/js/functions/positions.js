const getPositions = (positionInput, selectedPosition = null) => {   
    return new Promise((resolve, reject) => {
        $.ajax({
            url: "/helper/get/positions",
            success: function (response) {
                try {
                    if (response.error === 0) {
                        var data = response.data;
                        positionInput.html("");
                        positionInput.append(
                            '<option value=""></option>'
                        );
                        data.forEach((elm) => {
                            var newElm = `<option value="${elm.uid}" ${elm.uid === selectedPosition ? "selected" : ""
                                }>${elm.name}</option>`;
                            positionInput.append(newElm);
                        });
                        positionInput.selectpicker("refresh");
                        resolve();
                    } else {
                        reject(alert("Something went wrong, try again later!"));
                    }
                } catch (err) {
                    reject(alert("Something went wrong, try again later!"));
                }
            },
            error: (response) => {
                reject(alert("Something went wrong, try again later!"));
            },
        });
    });
};
