export function initExample1() {
  return {
    usersData: [
      {
        id: "1",
        avatar_url: "/images/200x200.png",
        name: "John Doe",
        age: "24",
        phone: "443-893-2318",
        role: "Superadmin",
        role_bg:
          "bg-secondary/10 text-secondary dark:bg-secondary-light/15 dark:text-secondary-light",
        status: true,
      },
      {
        id: "2",
        avatar_url: "/images/200x200.png",
        name: "Sabina Mores",
        age: "26",
        phone: "442-893-2318",
        role: "Author",
        role_bg: "bg-info/10 text-info dark:bg-info/15",
        status: false,
      },
      {
        id: "3",
        avatar_url: "/images/200x200.png",
        name: "Tom Robert",
        age: "34",
        phone: "443-893-2318",
        role: "Admin",
        role_bg:
          "bg-secondary/10 text-secondary dark:bg-secondary-light/15 dark:text-secondary-light",
        status: true,
      },
      {
        id: "4",
        avatar_url: "/images/200x200.png",
        name: "Nolan Doe",
        age: "28",
        phone: "443-893-2318",
        role: "Author",
        role_bg: "bg-info/10 text-info dark:bg-info/15",
        status: true,
      },
    ],
    allSelected: false,
    userIds: [],
    updateCheckAll() {
      this.allSelected = this.usersData.length === this.userIds.length;
    },
    selectAll() {
      this.userIds = [];
      if (this.allSelected) {
        for (user in this.usersData) {
          this.userIds.push(this.usersData[user].id.toString());
        }
      }
    },
  };
}

export function initGridTableExapmle() {
  return {
    table: null,
    config: {
      columns: [
        {
          id: "kodealias",
          name: "Kode Alias",
          formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
        },
        {
          id: "namakegiatan",
          name: "Nama Kegiatan",
          formatter: (cell) =>
            Gridjs.html(
              `<span class="text-slate-700 dark:text-navy-100 font-medium">${cell}</span>`
            ),
        },
        {
          id: "keterangan",
          name: "Keterangan",
        },
        {
          name: "Aksi",
          sort: false,
          formatter: () =>
            Gridjs.html(`<div class="flex justify-center space-x-2">
                            <button @click="editItem" class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button @click="deleteItem" class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </div>`),
        },
      ],
      data: [
        {
          kodealias: "KA-001",
          namakegiatan: "Anak-anak",
          keterangan: "Kelas Khusus Anak-anak"
        },
        {
          kodealias: "KA-002",
          namakegiatan: "Remaja",
          keterangan: "Kelas Khusus Remaja"
        },
        {
          kodealias: "KA-003",
          namakegiatan: "Harian",
          keterangan: "Kelas Harian "
        },
        {
          kodealias: "KA-004",
          namakegiatan: "Mingguan",
          keterangan: "Kelas Mingguan"
        },
        {
          kodealias: "KA-005",
          namakegiatan: "Spesial",
          keterangan: "Acara Spesial"
        }
      ],
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
    },
    deleteItem() {
      this.$notification({ text: "Item remove action", variant: "warning" });
    },

    editItem() {
      this.$notification({ text: "Item edit action", variant: "info" });
    },
  };
}
