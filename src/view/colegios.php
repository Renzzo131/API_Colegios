<!-- start page title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="page-title-box d-flex align-items-center justify-content-between p-0">
                    <h4 class="mb-0 font-size-18">Centros Educativos</h4>
                    <div class="page-title-right">
                        <a href="<?php echo BASE_URL; ?>nuevo-colegio" class="btn btn-primary waves-effect waves-light">+ Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filtros de Búsqueda</h4>
                <div class="row col-12">
                    <div class="form-group row mb-3 col-6">
                        <label for="busqueda_tabla_codigo" class="col-5 col-form-label">Código Modular:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="busqueda_tabla_codigo" id="busqueda_tabla_codigo">
                        </div>
                    </div>
                    <div class="form-group row mb-3 col-6">
                        <label for="busqueda_tabla_nombre" class="col-5 col-form-label">Nombre:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="busqueda_tabla_nombre" id="busqueda_tabla_nombre">
                        </div>
                    </div>
                    <div class="form-group row mb-3 col-6">
                        <label for="busqueda_tabla_departamento" class="col-5 col-form-label">Departamento:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="busqueda_tabla_departamento" id="busqueda_tabla_departamento">
                        </div>
                    </div>
                    <div class="form-group row mb-3 col-6">
                        <label for="busqueda_tabla_provincia" class="col-5 col-form-label">Provincia:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="busqueda_tabla_provincia" id="busqueda_tabla_provincia">
                        </div>
                    </div>
                    <div class="form-group row mb-3 col-6">
                        <label for="busqueda_tabla_distrito" class="col-5 col-form-label">Distrito:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="busqueda_tabla_distrito" id="busqueda_tabla_distrito">
                        </div>
                    </div>
                    <div class="form-group row mb-3 col-6">
                        <label for="busqueda_tabla_nivel" class="col-5 col-form-label">Nivel Educativo:</label>
                        <div class="col-7">
                            <select name="busqueda_tabla_nivel" id="busqueda_tabla_nivel" class="form-control">
                                <option value="">Todos</option>
                                <option value="Inicial">Inicial</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3 col-6">
                        <label for="busqueda_tabla_gestion" class="col-5 col-form-label">Gestión:</label>
                        <div class="col-7">
                            <select name="busqueda_tabla_gestion" id="busqueda_tabla_gestion" class="form-control">
                                <option value="">Todos</option>
                                <option value="Publica">Pública</option>
                                <option value="Privada">Privada</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3 col-6">
                        <label for="busqueda_tabla_atencion" class="col-5 col-form-label">Forma de atención:</label>
                        <div class="col-7">
                            <select name="busqueda_tabla_atencion" id="busqueda_tabla_atencion" class="form-control">
                                <option value="">Todos</option>
                                <option value="escolarizada">Escolarizada</option>
                                <option value="No escolarizada">No escolarizada</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0 text-center ">
                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="numero_pagina(1);"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="filtros_tabla_header" class="form-group  row page-title-box d-flex align-items-center justify-content-between m-0 mb-1 p-0">
                    <input type="hidden" id="pagina" value="1">
                    <input type="hidden" id="filtro_codigo_modular" value="">
                    <input type="hidden" id="filtro_nombre" value="">
                    <input type="hidden" id="filtro_departamento" value="">
                    <input type="hidden" id="filtro_provincia" value="">
                    <input type="hidden" id="filtro_distrito" value="">
                    <input type="hidden" id="filtro_nivel" value="">
                    <input type="hidden" id="filtro_atencion" value="">
                    <input type="hidden" id="filtro_gestion" value="">
                    <div>
                        <label for="cantidad_mostrar">Mostrar</label>
                        <select name="cantidad_mostrar" id="cantidad_mostrar" class="form-control-sm" onchange="numero_pagina(1);">
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <label for="cantidad_mostrar">registros</label>
                    </div>
                </div>
                <div id="tablas"></div>
                <div id="filtros_tabla_footer" class="form-group  row page-title-box d-flex align-items-center justify-content-between m-0 mb-1 p-0">
                    <div id="texto_paginacion_tabla">
                    </div>
                    <div id="paginacion_tabla">
                        <ul class="pagination justify-content-end" id="lista_paginacion_tabla">
                        </ul>
                    </div>
                </div>

                <div id="modals_editar"></div>
                <div id="modals_permisos"></div>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo BASE_URL; ?>src/view/js/functions_colegios.js"></script>
<script>
    listar_colegios();
</script>
<!-- end page title -->