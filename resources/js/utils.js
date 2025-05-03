import pdfMake from "pdfmake/build/pdfmake.min";
import pdfFonts from "./vfs_fonts.js";

pdfMake.vfs = pdfFonts;
