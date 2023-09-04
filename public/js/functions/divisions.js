const getDivisions = (divisionInput, selectedDivision = null) => {   
    return new Promise((resolve, reject) => {
        $.ajax({
            url: "/helper/get/divisions",
            success: function (response) {
                try {
                    if (response.error === 0) {
                        var data = response.data;
                        divisionInput.html("");
                        divisionInput.append(
                            '<option value=""></option>'
                        );
                        data.forEach((elm) => {
                            var newElm = `<option value="${elm.uid}" ${elm.uid === selectedDivision ? "selected" : ""
                                }>${elm.name}</option>`;
                            divisionInput.append(newElm);
                        });
                        divisionInput.selectpicker("refresh");
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
