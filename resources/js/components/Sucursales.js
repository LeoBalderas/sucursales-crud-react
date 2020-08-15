import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

const baseUrl = "http://localhost:8080/sucursales-crud-react/public/"

export default class Sucursales extends Component {

    constructor(props) {
        // Variables
        super(props);
        this.state = {
            sucursales: [],
            nombre: '',
            direccion: '',
            telefono: '',
            idSucursal: 0,
            editar: false
        }

        this.handleChangeNombre = this.handleChangeNombre.bind(this);
        this.handleChangeDireccion = this.handleChangeDireccion.bind(this);
        this.handleChangeTelefono = this.handleChangeTelefono.bind(this);

    }

    componentDidMount() {
        this.loadDataSucursal()
    }

    loadDataSucursal() {

        var token = document.querySelector('#token').value;

        $.ajax({
            url: baseUrl + 'api/sucursales/list',
            type: 'GET',
            contentType: 'application/json',
            headers: {
                'Authorization': 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODA4MFwvc3VjdXJzYWxlcy1jcnVkLXJlYWN0XC9wdWJsaWNcL2xvZ2luand0IiwiaWF0IjoxNTk2ODU2MzM5LCJleHAiOjE1OTY4NTk5MzksIm5iZiI6MTU5Njg1NjMzOSwianRpIjoicllCWGNNeFZ0dUdKcG85WCIsInN1YiI6MSwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.Ada0V28Xy5ocHsBmdHRVyEzELyNnzRp3oaaKcBUgzF0'
            },
            success: function (response) {
                this.setState({
                    sucursales: response.data
                })
            },
            error: function (error) {
                alert("Error " + error)
            }
        });
    }

    // loadDataSucursal() {
    //     axios.get(baseUrl + 'api/sucursales/list').then(response => {
    //         this.setState({
    //             sucursales: response.data
    //         })
    //     }).catch(error => {
    //         alert("Error " + error)
    //     })
    // }

    // Funciones onChange que actualiza los datos del formulario
    // Campo de nombre
    handleChangeNombre(event) {
        this.setState({ nombre: event.target.value });
    }

    // Campo de direccion
    handleChangeDireccion(event) {
        this.setState({ direccion: event.target.value });
    }

    // Campo de telefono
    handleChangeTelefono(event) {
        this.setState({ telefono: event.target.value });
    }

    render() {
        return (
            <div className="container">
                <div className="jumbotron text-center">
                    <h2 className=" card-title h2">Gestor de Sucursales</h2>
                    <h5 className="blue-text my-4 font-weight-bold">Listado de Sucursales</h5>
                </div>
                <div className="row">
                    <div className="col">
                        <button type="button" className="btn btn-primary col-md-4 float-right" onClick={() => this.showModalCreate()}>
                            Crear Sucursal
                         </button>
                    </div>
                </div>
                <hr />
                <table className="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Interacciones</th>
                        </tr>
                    </thead>
                    <tbody id="bodytable">
                        {this.renderList()}
                    </tbody>
                </table>

                <div className="modal fade" id="deleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">

                        <div className="modal-content">

                            <div className="modal-header">
                                <h5 className="modal-title" id="exampleModalLabel">Eliminar</h5>
                                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div className="modal-body">
                                <p>¿Esta seguro que desea eliminar el regsitro?</p>
                            </div>
                            <div className="modal-footer">
                                <button type="button" className="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" className="btn btn-primary" onClick={() => this.sendNetworkDelete()}>Eliminar</button>
                            </div>
                        </div>

                    </div>
                </div>

                <form>
                    <div className="modal fade" id="formModal" role="dialog" aria-hidden="true">
                        <div className="modal-dialog" role="document">
                            <div className="modal-content">
                                <div className="modal-header">
                                    <h5 className="modal-title" id="exampleModalLabel">Crear nueva sucursal</h5>
                                    <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div className="modal-body">
                                    <div className="form-group">
                                        <label>Nombre</label>
                                        <input type="text" className="form-control" value={this.state.nombre} onChange={this.handleChangeNombre} />
                                    </div>
                                    <div className="form-group">
                                        <label>Direccion</label>
                                        <textarea className="form-control" rows="3" value={this.state.direccion} onChange={this.handleChangeDireccion}></textarea>
                                    </div>
                                    <div className="form-group">
                                        <label>Telefono</label>
                                        <input type="number" className="form-control" value={this.state.telefono} onChange={this.handleChangeTelefono} />
                                    </div>
                                </div>
                                <div className="modal-footer">
                                    <button type="button" className="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    {
                                        this.state.editar ? // if
                                            <button type="button" class="btn btn-primary" onClick={() => this.sendNetworkUpdate()}>Actualizar</button>
                                            : // else
                                            <button type="button" class="btn btn-primary" onClick={() => this.sendNetworkCreate()}>Guardar</button>
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        );
    }

    showModalCreate() {
        this.setState({
            idSucursal: 0,
            nombre: "",
            direccion: "",
            telefono: "",
            edit: false
        })
        $("#formModal").modal("show");
    }

    sendNetworkCreate() {

        const data = new FormData()
        data.append('nombre', this.state.nombre)
        data.append('direccion', this.state.direccion)
        data.append('telefono', this.state.telefono)

        axios.post(baseUrl + 'api/sucursal/create', data).then(response => {

            if (response.data.success == true) {
                alert(response.data.message)
                // cargar datos de nuevo
                this.loadDataSucursal()
                // para cerrar el modal
                $("#formModal").modal("hide");
            }

        }).catch(error => {
            alert("Error " + error)
        })

    }

    showModalEdit(data) {
        //alert("mostrar modal "+JSON.stringify(data))
        this.setState({
            idSucursal: data.Cv_Sucursal,
            nombre: data.Nombre,
            direccion: data.Direccion,
            telefono: data.Telefono,
            editar: true
        })
        $("#formModal").modal("show");
    }

    sendNetworkUpdate() {

        const dataSucursal = {
            nombre: this.state.nombre,
            direccion: this.state.direccion,
            telefono: this.state.telefono
        };

        axios.patch(baseUrl + 'api/sucursal/update/' + this.state.idSucursal, dataSucursal).then(response => {

            if (response.data.success == true) {
                alert(response.data.message)
                // cargar datos de nuevo
                this.loadDataSucursal()
                // para cerrar el modal
                $("#formModal").modal("hide");
            }

        }).catch(error => {
            alert("Error " + error)
        })
    }

    showModalDelete(data) {
        // id seleccionado para eliminar
        this.setState({ idSucursal: data.Cv_Sucursal })
        $("#deleteModal").modal("show");
    }

    sendNetworkDelete() {

        axios.delete(baseUrl + 'api/sucursal/delete/' + this.state.idSucursal).then(response => {

            if (response.data.success == true) {
                alert(response.data.message)
                // cargar datos de nuevo
                this.loadDataSucursal()
                // para cerrar el modal
                $("#deleteModal").modal("hide");
            }

        }).catch(error => {
            alert("Error " + error)
        })
    }

    renderList() {

        return this.state.sucursales.map((data) => {

            return (
                <tr>
                    <td>{data.Cv_Sucursal}</td>
                    <td>{data.Nombre}</td>
                    <td>{data.Direccion}</td>
                    <td>{data.Telefono}</td>
                    <td>
                        <button className="btn btn-dark-green" onClick={() => this.showModalEdit(data)}>Editar</button>
                        <button className="btn btn-danger" onClick={() => this.showModalDelete(data)}>Eliminar</button>
                    </td>
                </tr>
            )

        })

    }

}


if (document.getElementById('sucursales')) {
    ReactDOM.render(<Sucursales />, document.getElementById('sucursales'));
}