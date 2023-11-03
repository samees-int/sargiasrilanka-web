// const { promises: fs } = require("fs");
const fs = require("fs-extra");
const path = require("path");
const archiver = require("archiver");
const pkg = require("../../package.json");

async function copyDir(src, dest) {
  await fs.mkdir(dest, { recursive: true });
  let entries = await fs.readdir(src, { withFileTypes: true });
  // Exclude all dot files and directories.
  entries = entries.filter((dirent) => !dirent.name.startsWith("."));
  const ignore = [
    "dist",
    "node_modules",
    "src",
    "vendor",
    "composer.json",
    "composer.lock",
    "package.json",
    "package-lock.json",
    "phpcs.xml.dist",
    "phpmd.baseline.xml",
    "phpmd.xml",
    "phpstan-baseline.neon",
    "phpstan.neon.dist",
  ];

  for (const entry of entries) {
    if (ignore.indexOf(entry.name) != -1) {
      continue;
    }
    let srcPath = path.join(src, entry.name);
    let destPath = path.join(dest, entry.name);

    entry.isDirectory()
      ? await copyDir(srcPath, destPath)
      : await fs.copyFile(srcPath, destPath);
  }
}
async function createZip() {
  const output = fs.createWriteStream(`./dist/${pkg.name}-${pkg.version}.zip`);
  const archive = archiver("zip", { zlib: { level: 9 } });

  output.on("close", () => {
    console.log("Zip file created successfully.");
  });

  archive.on("error", (err) => {
    throw err;
  });

  archive.pipe(output);

  // Copy the directory first
  await copyDir("./", `./dist/${pkg.name}-${pkg.version}`);

  // Append the directory to the archive
  archive.directory(`./dist/${pkg.name}-${pkg.version}`, false);

  // Finalize the archive
  archive.finalize();
}

createZip().catch((error) => console.error("Error creating zip:", error));
