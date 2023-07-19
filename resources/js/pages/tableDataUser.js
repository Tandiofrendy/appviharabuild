export const Datauser = {

    Umat: {
      
        valueField: "email",
        searchField: ['nama_mandarin','nama_indonesia'],
        load: function(query, callback) {
          var urls = window.location.origin;
          var url = urls+'/api/Datauser/View';
          fetch(url)
            .then(response => response.json())
            .then(json => {
              callback(json.data);
            }).catch(()=>{
              callback();
            });
    
        },
        placeholder: "Pilih pengguna",
        render: {
          option: function (data, escape) {
            return `<div class="flex space-x-3">
                          <div class="flex flex-col">
                            <span> ${escape(data.nama_indonesia)}</span>
                            <span class="text-xs opacity-80"> ${escape(
                              data.nama_mandarin
                            )}</span>
                          </div>
                        </div>`;
          },
          item: function (data, escape) {
            return `<span class="badge emails rounded-full bg-primary dark:bg-accent text-white p-px mr-2">
                          <span class="mx-4">${escape(data.nama_indonesia)}</span>
                        </span>`;
          },
        },
      },

      divisi:{
          valueField: "kode_divisi",
          labelField:'nama_divisi',
          searchField: 'nama_divisi',
          load: function(query, callback) {
            var urls = window.location.origin;
            var url = urls+'/api/Divisi/View';
            fetch(url)
              .then(response => response.json())
              .then(json => {
                callback(json.data);
              }).catch(()=>{
                callback();
              });
      
          },
          placeholder: "pilih divisi",
          render: {
            option: function (data, escape) {
              return `<div class="flex space-x-3">
                            <div class="flex flex-col">
                              <span> ${escape(data.nama_divisi)}</span>
                              <span class="text-xs opacity-80"> ${escape(
                                data.kode_divisi
                              )}</span>
                            </div>
                          </div>`;
            },
            item: function (data, escape) {
              return `<span class="badge rounded-full bg-primary dark:bg-accent text-white p-px mr-2">
                            <span class="mx-4">${escape(data.nama_divisi)}</span>
                          </span>`;
            },
          },
      }
}