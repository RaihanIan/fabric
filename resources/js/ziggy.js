const Ziggy = {"url":"http:\/\/localhost:8000","port":8000,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"landing":{"uri":"\/","methods":["GET","HEAD"]},"grade":{"uri":"grade","methods":["GET","HEAD"]},"about":{"uri":"about","methods":["GET","HEAD"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"landingpage":{"uri":"user\/landing","methods":["GET","HEAD"]},"mitra.index":{"uri":"mitra","methods":["GET","HEAD"]},"mitra.store":{"uri":"mitra","methods":["POST"]},"mitra.destroy":{"uri":"mitra\/{mitra}","methods":["DELETE"],"parameters":["mitra"],"bindings":{"mitra":"id"}},"mitra.update":{"uri":"mitra\/{mitra}","methods":["POST"],"parameters":["mitra"],"bindings":{"mitra":"id"}},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"supplier.index":{"uri":"supplier","methods":["GET","HEAD"]},"supplier.store":{"uri":"supplier","methods":["POST"]},"supplier.destroy":{"uri":"supplier\/{supplier}","methods":["DELETE"],"parameters":["supplier"],"bindings":{"supplier":"id"}},"supplier.update":{"uri":"supplier\/{supplier}","methods":["PUT"],"parameters":["supplier"],"bindings":{"supplier":"id"}},"kriteria.index":{"uri":"kriteria","methods":["GET","HEAD"]},"jenis.index":{"uri":"jenis","methods":["GET","HEAD"]},"jenis.store":{"uri":"jenis","methods":["POST"]},"jenis.destroy":{"uri":"jenis\/{jenis}","methods":["DELETE"],"parameters":["jenis"],"bindings":{"jenis":"id"}},"jenis.update":{"uri":"jenis\/{jenis}","methods":["PUT"],"parameters":["jenis"],"bindings":{"jenis":"id"}},"harga.index":{"uri":"harga","methods":["GET","HEAD"]},"harga.store":{"uri":"harga","methods":["POST"]},"harga.destroy":{"uri":"harga\/{harga}","methods":["DELETE"],"parameters":["harga"],"bindings":{"harga":"id"}},"harga.update":{"uri":"harga\/{harga}","methods":["PUT"],"parameters":["harga"],"bindings":{"harga":"id"}},"ketersediaan.index":{"uri":"ketersediaan","methods":["GET","HEAD"]},"ketersediaan.store":{"uri":"ketersediaan","methods":["POST"]},"ketersediaan.destroy":{"uri":"ketersediaan\/{ketersediaan}","methods":["DELETE"],"parameters":["ketersediaan"],"bindings":{"ketersediaan":"id"}},"ketersediaan.update":{"uri":"ketersediaan\/{ketersediaan}","methods":["PUT"],"parameters":["ketersediaan"],"bindings":{"ketersediaan":"id"}},"register":{"uri":"register","methods":["GET","HEAD"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"password.store":{"uri":"reset-password","methods":["POST"]},"verification.notice":{"uri":"verify-email","methods":["GET","HEAD"]},"verification.verify":{"uri":"verify-email\/{id}\/{hash}","methods":["GET","HEAD"],"parameters":["id","hash"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"password.confirm":{"uri":"confirm-password","methods":["GET","HEAD"]},"password.update":{"uri":"password","methods":["PUT"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };