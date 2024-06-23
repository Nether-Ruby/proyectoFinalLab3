export function leerLocalStorage(nombreItem) {
    console.log(localStorage)
    return JSON.parse(window.localStorage[nombreItem]) || []
}
export function crearItemLocalStorage(nombre,valor) {
    localStorage.setItem(nombre,JSON.stringify(valor))
    return JSON.parse(localStorage.getItem(nombre))

}
