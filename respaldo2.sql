CREATE OR REPLACE FUNCTION public.restar_stock()
    RETURNS trigger
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE NOT LEAKPROOF
AS $BODY$
BEGIN
    UPDATE products
    SET stock = stock - NEW.cantidad
    WHERE id = NEW.id_producto;
    RETURN NEW;
END;
$BODY$;

ALTER FUNCTION public.restar_stock()
    OWNER TO postgres;
	
CREATE OR REPLACE TRIGGER actualizar_stock
    AFTER INSERT
    ON public.ventas
    FOR EACH ROW
    EXECUTE FUNCTION public.restar_stock();