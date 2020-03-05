<template>
    <div class="card">
        <div class="card-header">Create Employed</div>
        <div class="card-body">
           <form @submit="save">
            <div class="form-group">
            <input v-model="nombre" type="text" name="nombre" placeholder="Name" class="form-control">
        </div>
         <div class="form-group">
            <input v-model="documento" type="text" name="documento" placeholder="Documento" class="form-control">
        </div>
         <div class="form-group">
            <input v-model="direccion" type="text" name="direccion" placeholder="direccion" class="form-control">
        </div>
         <div class="form-group">
            <input v-model="telefono" type="text" name="telefono" placeholder="telefono" class="form-control">
        </div>
        <div class="form-group">
        <select name="role_id" v-model="role_id" id="role_id" class="form-control">
                                    <option value="" disabled selected>Select User Role</option>
                                    <option value="1">Tecnico</option>
                                      <option value="2">Gerente</option>
                                </select>
        </div>
           <button type="submit" class="btn btn-primary">SAVE</button>
           </form>
        </div>
        <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                 <th>documento</th>
                                 <th>telefono</th>
                                 <th>direccion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="employee in employees.data" :key="employee.id">
                                <td>{{employee.nombres}}</td>
                                <td>{{employee.documento}}</td>
                                <td>{{employee.telefono}}</td>
                                 <td>{{employee.direccion}}</td>
                                
                            </tr>
                            </tbody>
                        </table>
                    </div>
    </div>
    
</template>

<script>
    export default {

        data() {
            return {
                employees:[],
                nombre: '',
                documento:'',
                direccion:'',
                telefono:'',
                role_id:''
            }
        },
        methods: {
            save(e){
                 e.preventDefault();

            axios.post(`api/create-employee`,{
                nombres: this.nombre,
                 documento:this.documento,
                direccion:this.direccion,
                telefono:this.telefono,
                role_id:this.role_id,
            })
            .then(response => {
            })
            },
            showemployed(){
                axios.get(`api/get-employee`)
            .then(response => {
                this.employees = response;
            })
            }
        },

        mounted() {
        this.showemployed()
        }

    }
</script>