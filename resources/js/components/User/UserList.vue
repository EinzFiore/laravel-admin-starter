<template>
<div>
  <div class="col-sm-12 mb-2">
      <div class="row">
        <div class="col-xl-6 col-sm-12">
          <div class="btn-group btn-group" role="group" aria-label="Basic example">
            <button class="btn btn-light btn-lg" @click="showModal()" type="button">Add New Users</button>
          </div>
        </div>
      </div>
  </div>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5>Data Users</h5>
      </div>
      <!-- Order Column styles-->
          <div class="card-body">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <table class="table" id="listUsers">
                  <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Create Date</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="data in users" :key="data.id">
                        <td>{{ data.name }}</td>
                        <td>{{ data.username }}</td>
                        <td>{{ data.roles.name }}</td>
                        <td>{{ data.email }}</td>
                        <td>{{ data.created_at }}</td>
                        <td>
                            <a href="#" class="btn btn-primary" @click="showModalEdit(data)">Edit</a>
                            <a href="#" class="btn btn-danger" @click="deleteData(data.id)">Hapus</a>
                        </td>
                    </tr>
                  </tbody>
              </table>
            </div>
          </div>
      <!-- Order Column Ends-->
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" ref="my-modal" id="show-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" v-show="!statusmodal">Tambah Data</h5>
          <h5 class="modal-title" id="exampleModalLabel" v-show="statusmodal">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form @submit.prevent="statusmodal ? ubahData() : simpanData()">
            <div class="modal-body">
                <div class="form-group">
                  <label>Nama User</label>
                  <input type="text" v-model="form.name" class="form-control" :class="{'is-invalid':form.errors.has('name')}" placeholder="Nama User">
                  <div class="text-danger" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" v-model="form.username" class="form-control" :class="{'is-invalid':form.errors.has('username')}" placeholder="Username">
                  <div class="text-danger" v-if="form.errors.has('username')" v-html="form.errors.get('username')" />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" v-model="form.email" class="form-control" :class="{'is-invalid':form.errors.has('email')}" placeholder="Email Address">
                  <div class="text-danger" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
                </div>
                <div class="form-group" v-show="!statusmodal">
                  <label>Password</label>
                  <input type="password" v-model="form.password" class="form-control" :class="{'is-invalid':form.errors.has('password')}" placeholder="***34">
                  <div class="text-danger" v-if="form.errors.has('password')" v-html="form.errors.get('password')" />
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" v-model="form.role" :class="{'is-invalid':form.errors.has('role')}">
                    <option>-- Pilih Role --</option>
                    <option value="2">PDAD</option>
                    <option value="3">PKC</option>
                  </select>
                  <div class="text-danger" v-if="form.errors.has('role')" v-html="form.errors.get('role')" />
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" :disabled="form.busy" class="btn btn-primary" v-show="!statusmodal">Tambah</button>
              <button type="submit" class="btn btn-primary" v-show="statusmodal">Ubah</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            disabled: false,
            statusmodal: false,
            users: [],
            form: new Form({
                id: "",
                name: "",
                username: "",
                email: "",
                password: "",
                role: "",
            }),
        }
    },
    methods: {
        showModal() {
          this.statusmodal = false;
          // this.form.reset();
          $("#show-modal").modal("show");
        },
        showModalEdit(item) {
            this.statusmodal = true;
            this.form.reset();
            $("#show-modal").modal("show");
            this.form.fill(item);
        },
        loadData: function () {
            axios
            .get("api/admin/users/list")
            .then((res)=>
            {
              this.users = res.data;
              setTimeout(function(){
                $('#listUsers').DataTable();
                },
              100
              );
            })
        },
      simpanData() {
        this.$Progress.start();
        this.loading = true;
        this.disabled = true;
        this.form
            .post("api/admin/users/add")
            .then(() => {
                Fire.$emit("refreshData");
                $("#show-modal").modal("hide");
                Toast.fire({
                    icon: "success",
                    title: "Data Berhasil Tersimpan"
                });
                this.$Progress.finish();
                this.loading = false;
                this.disabled = false;
            })
            .catch(() => {
                this.$Progress.fail();
                this.loading = false;
                this.disabled = false;
            });
        },

        ubahData() {
            this.$Progress.start();
            this.loading = true;
            this.disabled = true;
            this.form
                .post("api/admin/users/update/" + this.form.id)
                .then(() => {
                    Fire.$emit("refreshData");
                    $("#show-modal").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Data Berhasil Terupdate"
                    });
                    this.$Progress.finish();
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(() => {
                    this.$Progress.fail();
                    this.loading = false;
                    this.disabled = false;
                });
        },

        deleteData(id) {
            Swal.fire({
                title: "Anda Yakin Ingin Menghapus Data Ini ?",
                text: "Klik Batal Untuk Membatalkan Penghapusan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
            }).then(result => {
                if (result.value) {
                    this.form
                        .delete("api/admin/users/delete/" + id)
                        .then(() => {
                            Swal.fire(
                                "Terhapus",
                                "Data Anda Sudah Tehapus",
                                "success"
                            );
                            Fire.$emit("refreshData");
                        })
                        .catch(() => {
                            Swal.fire(
                                "Gagal",
                                "Data Gagal Terhapus",
                                "warning"
                            );
                        });
                }
            });
        }
  },
      created() {
        this.loadData();
        Fire.$on("refreshData", () => {
            this.loadData();
        });
    },
}
</script>