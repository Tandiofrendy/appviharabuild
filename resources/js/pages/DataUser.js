export function Tabledatauser() {
  var url = window.location.origin;
 
  return {
    table: null,
    config: {
      columns: [
        {
            id: "email",
            name: "email",
            formatter: (cell) =>
              Gridjs.html(
                `<span class="text-slate-700 dark:text-navy-100 font-medium">${cell}</span>`
              ),
          },
          {
            id: "name",
            name: "Username",
            formatter: (cell) =>
              Gridjs.html(
                `<span class="text-slate-700 dark:text-navy-100 font-medium">${cell}</span>`
              ),
          },
          {
            id: "nama_mandarin",
            name: "Nama Mandarin",
            formatter: (cell) =>
              Gridjs.html(
                `<span class="text-slate-700 dark:text-navy-100 font-medium">${cell}</span>`
              ),
          },
          {
            id: "nama_indonesia",
            name: "Nama Indonesia",
            formatter: (cell) =>
              Gridjs.html(
                `<span class="text-slate-700 dark:text-navy-100 font-medium">${cell}</span>`
              ),
          },
          {
            id: "ttlahir",
            name: "Tahun & Tanggal Lahir",
          },
          {
            id: "nohp",
            name: "Nomor Hp",
          },
          {
            id: "jenis_kelamin",
            name: "Jenis Kelamin",
          },
          {
            id: "alamat",
            name: "Alamat",
          }
      ],
      server: {
            url: url+'/api/Datauser/View',
            then: data => data.data.map(data => [ data.email, data.name, data.nama_mandarin,data.nama_indonesia,data.ttlahir,data.nohp,data.jenis_kelamin,data.alamat])
        },
      sort: true,
      search: true,
      pagination: {
        enabled: true,
        limit: 10,
      },
      className: {
        table: "is-hoverable w-full text-left",
        thead: "",
        tr: "border border-transparent border-b-slate-200 dark:border-b-navy-500",
        th: "whitespace-nowrap bg-slate-200 px-3 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5",
        td: "whitespace-nowrap px-4 py-3 sm:px-5",
        search: "flex justify-end px-4 sm:px-5 pb-5",
        pagination:
          "flex flex-col justify-between space-y-4 sm:flex-row sm:items-center sm:space-y-0 px-4 sm:px-5 py-4",
      },
    },
    init() {
      this.table = new Gridjs.Grid(this.config).render(this.$root);
    }
  };
  }