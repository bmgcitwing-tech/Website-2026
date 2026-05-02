const fs = require("fs");
const sql = fs.readFileSync("bmglobalcareers website/database/bmglobalcareers.sql", "utf8");

function extractVideos(tableName) {
  const match = sql.match(new RegExp(`INSERT INTO \\\`${tableName}\\\`.*?VALUES\n(.*?);`, "s"));
  if (!match) return [];
  const valuesStr = match[1];
  
  // A somewhat robust parsing for SQL inserts that don't have complex commas inside quotes
  const videos = [];
  const rows = valuesStr.split(/\),\n\(/);
  
  for (let row of rows) {
    row = row.replace(/^\(/, "").replace(/\)$/, "");
    // Split by comma, but ignore commas inside quotes
    const regex = /'(?:[^'\\]|\\.)*'|NULL|\d+|NDL/g;
    const parts = [];
    let m;
    while ((m = regex.exec(row)) !== null) {
      parts.push(m[0]);
    }
    if (parts.length > 5) {
      const title = parts[2] ? parts[2].replace(/^'|'$/g, "").trim() : "";
      const url = parts[3] ? parts[3].replace(/^'|'$/g, "").trim() : "";
      // find status index
      // The old site uses NDL as active.
      if (row.includes("'NDL'")) {
         // handle url like https://youtu.be/...
         let id = url;
         if (url.includes("youtu.be/")) id = url.split("youtu.be/")[1];
         else if (url.includes("youtube.com/watch?v=")) id = url.split("youtube.com/watch?v=")[1].split("&")[0];
         if (id && title && title !== "test" && title !== "etert") {
            videos.push({ id, title, desc: "Student Story" }); // generic desc
         }
      }
    }
  }
  return videos;
}

const vids1 = extractVideos("tbl_videos_details");
const vids2 = extractVideos("tbl_youtube_details");

console.log(JSON.stringify(vids1, null, 2));
