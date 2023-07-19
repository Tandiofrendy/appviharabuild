export function validate() {
    return {
      kodekategori: {
        value: "",
        errorMessage: "",
        customMessage: "kode kategori wajib diisi !!",
        blurred: false,
        validate: ["required"],
      },
      namakategori:{
        value: "",
        errorMessage: "",
        customMessage: "nama kategori masih kosong !!",
        blurred: false,
        validate: ["required"],
      },
      keterangan:{
        value: "",
        errorMessage: "",
        customMessage: "keterangan masih kosong !!",
        blurred: false,
        validate: ["required"],
      },
      getErrorMessage(value, rules) {
        let isValid = Iodine.is(value, rules);
        if (isValid !== true) {
          return Iodine.getErrorMessage(isValid);
        }
        return "";
      },
    };
  }
  