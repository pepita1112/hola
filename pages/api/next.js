export default function handler(req, res) {
    if (req.method === "POST") {
        const { email, password } = req.body;

        // Aquí puedes procesar los datos como quieras
        console.log("Datos recibidos:", email, password);

        // Guardar en localStorage no es posible en el backend, pero podrías almacenarlo en una base de datos
        res.status(200).json({ success: true });
    } else {
        res.status(405).json({ message: "Método no permitido" });
    }
}
