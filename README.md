# DGII JSON Generator 🇸🇻

Paquete para generar JSON de los documentos electrónicos DTE (Factura, Guía de remisión, Nota crédito, Nota débito y Comprobante de retención) El Salvador.

## Instalación

```bash
composer require dazza-dev/dgii-json-generator
```

## Uso

Hacemos uso de un builder para facilitar la creación del documento: simplemente pasa un `array` con la estructura requerida y el builder se encarga de construir cada modelo basado en el tipo de documento.

```php
use DazzaDev\DgiiJsonGenerator\Factories\DocumentBuilderFactory;

$builder = DocumentBuilderFactory::create(
    $environmentCode,
    $documentType,
    $documentData
);
```

### Tipos admitidos

Tabla de códigos de ambiente y tipos de documentos permitidos.

| Environment code | Nombre     |
| ---------------- | ---------- |
| `00`             | Pruebas    |
| `01`             | Producción |

| Document type             | Nombre en español             |
| ------------------------- | ----------------------------- |
| `invoice`                 | Factura                       |
| `credit-note`             | Nota crédito                  |
| `debit-note`              | Nota débito                   |
| `delivery-note`           | Nota de remisión              |
| `donation-receipt`        | Comprobante de donación       |
| `export-invoice`          | Factura de exportación        |
| `exempt-taxpayer-invoice` | Factura de sujeto excluido    |
| `tax-credit-invoice`      | Comprobante de crédito fiscal |
| `contingency`             | Evento de contingencia        |
| `invalidation`            | Evento de invalidación        |

## Contribuciones

Contribuciones son bienvenidas. Si encuentras algún error o tienes ideas para mejoras, por favor abre un issue o envía un pull request. Asegúrate de seguir las guías de contribución.

## Autor

DGII JSON Generator fue creado por [DAZZA](https://github.com/dazza-dev).

## Licencia

Este proyecto está licenciado bajo la [Licencia MIT](https://opensource.org/licenses/MIT).
