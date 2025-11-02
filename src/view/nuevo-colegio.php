<!-- start page title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Nuevo Centro Educativo</h4>
                <br>
                <form class="form-horizontal" id="frmRegistrarCentroEducativo">
                    
                    <!-- Datos principales -->
                    <div class="form-group row mb-2">
                        <label for="codigo_modular" class="col-3 col-form-label">Código Modular</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="codigo_modular" name="codigo_modular" maxlength="7">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="nombre_ie" class="col-3 col-form-label">Nombre de la IE</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="nombre_ie" name="nombre_ie">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="nivel_modalidad" class="col-3 col-form-label">Nivel / Modalidad</label>
                        <div class="col-9">
                            <select class="form-control" id="nivel_modalidad" name="nivel_modalidad">
                                <option value="">Seleccione</option>
                                <option value="A1">Primaria</option>
                                <option value="A2">Inicial</option>
                                <option value="A3">Secundaria</option>
                                <option value="A4">Superior</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="detalle_nivel" class="col-3 col-form-label">Detalle del Nivel</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="detalle_nivel" name="detalle_nivel">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="forma_atencion" class="col-3 col-form-label">Forma de Atención</label>
                        <div class="col-9">
                            <select class="form-control" id="forma_atencion" name="forma_atencion">
                                <option value="">Seleccione</option>
                                <option value="Escolarizada">Escolarizada</option>
                                <option value="No Escolarizada">No Escolarizada</option>
                                <option value="Alternativa">Alternativa</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="genero_alumnos" class="col-3 col-form-label">Género de Alumnos</label>
                        <div class="col-9">
                            <select class="form-control" id="genero_alumnos" name="genero_alumnos">
                                <option value="">Seleccione</option>
                                <option value="Mixto">Mixto</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <!-- Gestión y dependencia -->
                    <div class="form-group row mb-2">
                        <label for="gestion" class="col-3 col-form-label">Gestión</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="gestion" name="gestion">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="dependencia" class="col-3 col-form-label">Dependencia</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="dependencia" name="dependencia">
                        </div>
                    </div>

                    <!-- Información administrativa -->
                    <div class="form-group row mb-2">
                        <label for="director" class="col-3 col-form-label">Director(a)</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="director" name="director">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="telefono" class="col-3 col-form-label">Teléfono</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="telefono" name="telefono" maxlength="35">
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div class="form-group row mb-2">
                        <label for="direccion_local" class="col-3 col-form-label">Dirección</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="direccion_local" name="direccion_local">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="localidad" class="col-3 col-form-label">Localidad</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="localidad" name="localidad">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="centro_poblado" class="col-3 col-form-label">Centro Poblado</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="centro_poblado" name="centro_poblado">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="area_censo" class="col-3 col-form-label">Área Censo</label>
                        <div class="col-9">
                            <select class="form-control" id="area_censo" name="area_censo">
                                <option value="">Seleccione</option>
                                <option value="Urbana">Urbana</option>
                                <option value="Rural">Rural</option>
                            </select>
                        </div>
                    </div>

                    <!-- Ubigeo -->
                    <div class="form-group row mb-2">
                        <label for="departamento" class="col-3 col-form-label">Departamento</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="departamento" name="departamento">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="provincia" class="col-3 col-form-label">Provincia</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="provincia" name="provincia">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="distrito" class="col-3 col-form-label">Distrito</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="distrito" name="distrito">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="region" class="col-3 col-form-label">Región</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="region" name="region">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="ugel" class="col-3 col-form-label">UGEL</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="ugel" name="ugel">
                        </div>
                    </div>

                    <!-- Datos adicionales -->
                    <div class="form-group row mb-2">
                        <label for="turno" class="col-3 col-form-label">Turno</label>
                        <div class="col-9">
                            <select class="form-control" id="turno" name="turno">
                                <option value="">Seleccione</option>
                                <option value="Mañana">Mañana</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noche">Noche</option>
                                <option value="Integral">Integral</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="ruc" class="col-3 col-form-label">RUC</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="ruc" name="ruc" maxlength="11">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="razon_social" class="col-3 col-form-label">Razón Social</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="razon_social" name="razon_social">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="estado" class="col-3 col-form-label">Estado</label>
                        <div class="col-9">
                            <select class="form-control" id="estado" name="estado">
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="total_secciones" class="col-3 col-form-label">Total de Secciones</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="total_secciones" name="total_secciones" min="0">
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="form-group mb-0 justify-content-end row text-center">
                        <div class="col-12">
                            <a href="<?php echo BASE_URL; ?>colegios" class="btn btn-light waves-effect waves-light">Regresar</a>
                            <button type="button" class="btn btn-success waves-effect waves-light" onclick="registrar_centro_educativo();">Registrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>src/view/js/functions_colegios.js"></script>
<!-- end page title -->
