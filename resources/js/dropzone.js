import Dropzone from "dropzone";

(function (cash) {
    "use strict";

    // Dropzone
    Dropzone.autoDiscover = false;
    cash(".dropzone").each(function () {
        let options = {
            accept: (file, done) => {
                console.log("Uploaded");
                done();
            },
            autoProcessQueue: false,
            parallelUploads: 10,
            maxFilesize: 10,
            renameFile: function (file) {
                var drt = new Date();
                var time = drt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.pdf",
            addRemoveLinks: true,
            timeout: 60000,
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };

        // if (cash(this).data("single")) {
        //     options.maxFiles = 1;
        // }

        // if (cash(this).data("file-types")) {
        //     options.accept = (file, done) => {
        //         if (
        //             cash(this)
        //                 .data("file-types")
        //                 .split("|")
        //                 .indexOf(file.type) === -1
        //         ) {
        //             alert("Error! Files of this type are not accepted");
        //             done("Error! Files of this type are not accepted");
        //         } else {
        //             console.log("Uploaded");
        //             done();
        //         }
        //     };
        // }

        var dz = new Dropzone(this, options);

        dz.on("maxfilesexceeded", (file) => {
            alert("No more files please!");
        });

        cash("#aguulga-save-btn").on("click", function () {
            dz.processQueue();
            document.getElementById('aguulga-save-form').submit();
        });
    });

    cash('#aguulga_file_type').on('change', function() {
        if(cash(this).val() == 2){
            cash(".aguulga_embed").show();
            cash(".aguulga_file").hide();
        }else{
            cash(".aguulga_embed").hide();
            cash(".aguulga_file").show();
        }
    });

    
    
    
})(cash);
