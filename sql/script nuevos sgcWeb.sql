
-- habitante
CREATE TABLE habitante (
	ci_persona character varying(11) NOT null REFERENCES persona (cedula) PRIMARY KEY,
	id_unidad integer NOT null REFERENCES unidad (id),
	activo boolean DEFAULT true;
);

-- puente_propietario_habitante
CREATE TABLE puente_propietario_habitante (
	ci_propietario character varying NOT null REFERENCES propietario (ci_persona),
	ci_habitante character varying NOT null REFERENCES habitante (ci_persona),
	parentesco integer
);

-- agregar_habitante
-- DROP FUNCTION agregar_habitante;
CREATE OR REPLACE FUNCTION agregar_habitante(
	_cedula character varying,
	_nombre character varying,
	_s_nombre character varying,
	_apellido character varying,
	_s_apellido character varying,
	_telefono character varying,
	_correo character varying,
	_unidad character varying,
	_propietario character varying,
	_parentesco integer,
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
	INSERT INTO habitante (ci_persona, id_unidad) VALUES (_cedula, (SELECT id FROM unidad WHERE n_unidad = _unidad)) ON CONFLICT DO NOTHING;
	GET DIAGNOSTICS resul = ROW_COUNT;

	IF resul <> 1 THEN
		RAISE WARNING 'No se pudo agregar en habitante';
		RETURN false;

	ELSE
		RAISE INFO 'Éxito';
		INSERT INTO puente_propietario_habitante (ci_propietario, ci_habitante, parentesco) VALUES (_propietario, _cedula, _parentesco);
		GET DIAGNOSTICS resul = ROW_COUNT;
		
		IF resul <> 1 THEN
			RAISE WARNING 'No se pudo agregar en puente_propietario_habitante';
			RETURN false;

		ELSE
			RAISE INFO 'Éxito';
			RETURN true;
		END IF;
	END IF;
END;
$$ LANGUAGE plpgsql;
