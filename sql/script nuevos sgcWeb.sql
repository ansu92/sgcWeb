
-- habitante
CREATE TABLE habitante (
	ci_persona character varying(11) NOT null REFERENCES persona (cedula) PRIMARY KEY,
	id_unidad integer NOT null REFERENCES unidad (id)
);

-- puente_propietario_habitante
CREATE TABLE puente_propietario_habitante (
	ci_propietario character varying NOT null REFERENCES propietario (ci_persona),
	ci_habitante character varying NOT null REFERENCES habitante (ci_persona),
	parentesco integer
);

-- agregar_habitante
-- DROP TABLE habitante ON CASCADE;
CREATE OR REPLACE FUNCTION agregar_habitante(
	_cedula character varying,
	_nombre character varying,
	_s_nombre character varying,
	_apellido character varying,
	_s_apellido character varying,
	_telefono character varying,
	_correo character varying,
	_existe boolean
) RETURNS boolean AS $$
DECLARE
	resul integer;
	fila RECORD;
BEGIN
	IF _existe = false THEN
		RAISE INFO 'Agregando en la tabla persona...';
		INSERT INTO persona (cedula, p_nombre, s_nombre, p_apellido, s_apellido, telefono, correo) VALUES (_cedula, _nombre, _s_nombre, _apellido, _s_apellido, _telefono, _correo) ON CONFLICT DO NOTHING;
		GET DIAGNOSTICS resul = ROW_COUNT;

		IF resul <> 1 THEN
			RAISE WARNING 'No se pudo agregar en persona';
			RETURN false;
		ELSE
			RAISE INFO 'Éxito';
			SELECT * INTO fila FROM persona WHERE cedula = _cedula;
		END IF;
	END IF;

	RAISE INFO 'Agregando en la tabla habitante...';
	INSERT INTO habitante (ci_persona) VALUES (_cedula) ON CONFLICT DO NOTHING;
	GET DIAGNOSTICS resul = ROW_COUNT;

	IF resul <> 1 THEN
		RAISE WARNING 'No se pudo agregar en habitante';
		RETURN false;

	ELSE
		RAISE INFO 'Éxito';
		RETURN true;
	END IF;
END;
$$ LANGUAGE plpgsql;

SELECT u.id, u.n_unidad, u.n_documento, u.direccion, u.alicuota, id_tipo, tu.tipo 
FROM unidad AS u 
INNER JOIN tipo_unidad AS tu ON tu.id = u.id_tipo 
INNER JOIN puente_unidad_propietarios AS up ON up.id_unidad = u.id
WHERE u.activo = true AND up.activo = true AND up.ci_propietario = 'V-26942316';
